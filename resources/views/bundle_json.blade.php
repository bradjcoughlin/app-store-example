{
  "applications": [
    {
      "type": "sandbox",
      "id": "{{ config('app.id') }}",
      "name": "{{ config('app.name') }}",
      "blurb": "The Symphony News App provides platform tips and tricks, updates about your community, real-world use cases, and the latest Symphony news and blog posts.",
      "publisher": "Symphony",
      "url": "{{ config('app.url') }}/controller.html",
      "icon": "{{ config('app.url') }}/images/newsapp-icon.png",
      "domain": "{{ config('app.domain') }}"
    }
  ]
}