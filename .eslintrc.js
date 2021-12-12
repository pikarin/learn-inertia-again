// eslint-disable-next-line no-undef
module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  extends: ['eslint:recommended', 'plugin:vue/vue3-recommended'],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: 'module',
  },
  rules: {
    indent: ['error', 2],
    'linebreak-style': ['error', 'unix'],
    quotes: ['error', 'single'],
    semi: 'off',

    'vue/order-in-components': ['error'],
    'vue/require-default-prop': ['error'],
    'vue/no-v-html': 'off',
    'vue/max-attributes-per-line': [
      'error',
      {
        singleline: 2,
        multiline: 2,
      },
    ],
    'vue/html-indent': [
      'error',
      2,
      {
        baseIndent: 0,
      },
    ],
  },
  globals: { require: true, defineProps: true },
}
