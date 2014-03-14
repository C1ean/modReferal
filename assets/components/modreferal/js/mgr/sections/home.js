modReferal.page.Home = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		components: [{
			xtype: 'modreferal-panel-home'
			,renderTo: 'modreferal-panel-home-div'
		}]
	}); 
	modReferal.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(modReferal.page.Home,MODx.Component);
Ext.reg('modreferal-page-home',modReferal.page.Home);