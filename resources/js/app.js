import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import AppLayout from './Shared/AppLayout.vue'

createInertiaApp({
  resolve: async name => {
    const page = (await import(`./Pages/${name}`)).default
    page.layout ??= AppLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

InertiaProgress.init({
  color: 'red',
  showSpinner: true,
})
