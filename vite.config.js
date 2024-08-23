import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
	build: {
		outDir: 'dist',
		manifest: true,
		rollupOptions: {
			input: {
				main: path.resolve(__dirname, 'assets/js/main.js'),
				style: path.resolve(__dirname, 'assets/scss/main.scss')
			},
			output: {
				assetFileNames: (assetInfo) => {
					if (assetInfo.name.endsWith(".css")) return "assets/css/[name].[ext]";
					return "assets/js/[name].[ext]";
				}
			}
		},
	},
});
