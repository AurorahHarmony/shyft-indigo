import { defineConfig } from 'vite'
import laravel from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import path from 'path'

export default defineConfig({
	plugins: [
		inertia(),
		vue(),
		laravel(),
	],
    resolve: {
        alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
      },
})
