import globals from "globals";
import pluginJs from "@eslint/js";
import tseslint from "typescript-eslint";
import pluginVue from "eslint-plugin-vue";
import eslintPluginPrettierRecommended from "eslint-plugin-prettier/recommended";

/** @type {import("eslint").Linter.Config[]} */
export default [
    {
        ignores: [
            "**/node_modules/",
            "**/vendor/",
            "bootstrap/",
            "public/",
            "storage/",
        ],
    },
    {
        files: ["**/*.{js,mjs,cjs,ts,vue}"],
    },
    { languageOptions: { globals: globals.browser } },
    pluginJs.configs.recommended,
    ...tseslint.configs.recommended,
    ...pluginVue.configs["flat/recommended"],
    eslintPluginPrettierRecommended,
    {
        files: ["**/*.vue"],
        languageOptions: {
            globals: {
                Club: "readonly",
                route: "readonly",
            },
            parserOptions: { parser: tseslint.parser },
        },
        rules: {
            "vue/multi-word-component-names": "off",
            "vue/max-attributes-per-line": [
                "error",
                {
                    singleline: {
                        max: 1,
                    },
                    multiline: {
                        max: 1,
                    },
                },
            ],
        },
    },
];
