import { createApp, h } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import AppLayout from './Shared/AppLayout.vue'

createInertiaApp({
  resolve: async name => {
    const page = (await import(`./Pages/${name}`)).default

    if (page.layout === undefined) {
      page.layout = AppLayout
    }

    return page
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('Head', Head)
      .use(plugin)
      .mount(el)
  },

  title: title => `My App - ${title}`,
})

InertiaProgress.init({
  color: 'red',
  showSpinner: true,
})
