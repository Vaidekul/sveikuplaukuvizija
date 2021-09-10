/*global 
    require:true
		module:true
*/
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const {merge} = require('webpack-merge')
const common = require('./webpack.common.js')
module.exports = merge(common, {
	mode: "production",
	optimization: {
		minimizer: [
			new UglifyJSPlugin({
				uglifyOptions: {
					mangle: true,
					minimize: true,
					drop_console: true,
					comments: false,
					'screw-ie8': true,
					drop_debugger: true,
					compress: {
						drop_console: true,
						properties: true,
						sequences: true,
						dead_code: true,
						conditionals: true,
						comparisons: true,
						evaluate: true,
						booleans: true,
						unused: true,
						loops: true,
						hoist_funs: true,
						if_return: true,
						join_vars: true,
						drop_debugger: true,
						negate_iife: true,
						unsafe: true,
						hoist_vars: true,
					},
				}
			}),
		]
	}
})
