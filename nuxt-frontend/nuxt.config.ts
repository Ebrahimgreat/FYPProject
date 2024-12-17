// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },

        dir:{
            pages:'pages'
        },

        modules:['@pinia/nuxt','@nuxtjs/tailwindcss', ],
    plugins:[
        {src:'~/plugins/chart',mode:'client'}
    ],



})
