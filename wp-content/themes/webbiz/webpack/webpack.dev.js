/*global 
    require:true
	module:true
*/
const {merge} = require('webpack-merge')
const common = require('../webpack/webpack.common.js')

module.exports = merge(common, {
	devtool: 'source-map',
	watch: true,
	plugins: [
	]
})