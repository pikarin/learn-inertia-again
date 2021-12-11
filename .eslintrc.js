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
    'vue/max-attributes-per-line': [
      'error',
      {
        singleline: {
          max: 2,
          allowFirstLine: true,
        },
      },
    ],
  },
  globals: { require: true, defineProps: true },
}
