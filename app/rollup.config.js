import path from 'path'
import svelte from 'rollup-plugin-svelte'
import resolve from '@rollup/plugin-node-resolve'
import commonjs from '@rollup/plugin-commonjs'
import { terser } from 'rollup-plugin-terser'
import alias from '@rollup/plugin-alias'
import rollupGlob from 'rollup-plugin-glob'

const production = !process.env.ROLLUP_WATCH;
const rootDir = path.resolve(__dirname);

export default {
	input: 'src/main.js',
	output: {
		sourcemap: true,
		format: 'iife',
		name: 'app',
		file: 'build/bundle.js'
	},
	plugins: [
		rollupGlob(),
		alias({
			entries: [
				{
					find: 'store',
					replacement: path.resolve(rootDir, 'src/store')
				},
				{
					find: 'methods',
					replacement: path.resolve(rootDir, 'src/methods')
				},
			]
		}),
		svelte({
			dev: !production,
			css: css => {
				css.write('build/bundle.css');
			}
		}),
		resolve({
			browser: true,
			dedupe: ['svelte']
		}),
		commonjs(),
		production && terser()
	],
	watch: {
		clearScreen: false
	}
};