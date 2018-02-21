/**
* Licensed to the Symphony Software Foundation (SSF) under one
* or more contributor license agreements.  See the NOTICE file
* distributed with this work for additional information
* regarding copyright ownership.  The SSF licenses this file
* to you under the Apache License, Version 2.0 (the
* "License"); you may not use this file except in compliance
* with the License.  You may obtain a copy of the License at
*
*   http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing,
* software distributed under the License is distributed on an
* "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
* KIND, either express or implied.  See the License for the
* specific language governing permissions and limitations
* under the License.
**/

// Controller vars
var appUrl = "{{ config('app.url') }}";
var appId = "{{ config('app.id') }}";
var appName = "{{ config('app.name') }}";
var serviceName = appId + ":controller";

// Create our own local controller service.
var controllerService = SYMPHONY.services.register(serviceName);

// All Symphony services are namespaced with SYMPHONY
SYMPHONY.remote.hello().then(function(data) {

	// Register our application with the Symphony client:
	// Subscribe the application to remote (i.e. Symphony's) services
	// Register our own local services
	SYMPHONY.application.register(appId, ["modules", "applications-nav", "ui", "share"], [serviceName]).then(function(response) {

		// The userReferenceId is an anonymized random string that can be used for uniquely identifying users.
		// The userReferenceId persists until the application is uninstalled by the user. 
		// If the application is reinstalled, the userReferenceId will change.
		var userId = response.userReferenceId;

		// Subscribe to Symphony's services
		var modulesService = SYMPHONY.services.subscribe("modules");
		var navService = SYMPHONY.services.subscribe("applications-nav");
		var uiService = SYMPHONY.services.subscribe("ui");
		var shareService = SYMPHONY.services.subscribe("share");

		// LEFT NAV: Add an entry to the left navigation for our application
		navService.add("newsapp-nav", {title: appName, icon: appUrl + "/images/newsapp-sprite.png"}, serviceName);

		// Add an entry point to the top nav header
		uiService.registerExtension('header', 'newsapp-header', serviceName, {
			label: 'News 2',
			icon: 'tempo-icon--news'
		});

		// SHARE: Set the controller that implements the "link" method invoked when shared articles are clicked on.
		shareService.handleLink("article", serviceName);

		// Implement some methods on our local service. These will be invoked by user actions.
		controllerService.implement({

			// LEFT NAV & MODULE: When the left navigation item is clicked on, invoke Symphony's module service to show our application in the grid
			select: function(id) {
				showNews(id);
			},
			trigger: function(id) {
				showNews(id);
			}
		});

		function showNews(id) {
			if (id == "newsapp-nav" || id== "newsapp-header") {
				// Focus the left navigation item when clicked
				navService.focus("newsapp-nav");
			}

			modulesService.show(appId, {title: appName}, serviceName, appUrl, {
				// You must specify canFloat in the module options so that the module can be pinned
				"canFloat": true,
			});
			
			// Focus the module after it is shown
			modulesService.focus(appId);
		}

	}.bind(this))
}.bind(this));
