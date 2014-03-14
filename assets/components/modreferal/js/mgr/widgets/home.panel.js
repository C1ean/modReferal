modReferal.panel.Home = function(config) {
	config = config || {};
	Ext.apply(config,{
		border: false
		,baseCls: 'modx-formpanel'
		,items: [{
			html: '<h2>'+_('modreferal')+'</h2>'
			,border: false
			,cls: 'modx-page-header container'
		},{
			xtype: 'modx-tabs'
			,bodyStyle: 'padding: 10px'
			,defaults: { border: false ,autoHeight: true }
			,border: true
			,activeItem: 0
			,hideMode: 'offsets'
			,items: [{
				title: _('modreferal_items')
				,items: [{
					html: _('modreferal_intro_msg')
					,border: false
					,bodyCssClass: 'panel-desc'
					,bodyStyle: 'margin-bottom: 10px'
				},{
					xtype: 'modreferal-grid-items'
					,preventRender: true
				}]
			}]
		}]
	});
	modReferal.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(modReferal.panel.Home,MODx.Panel);
Ext.reg('modreferal-panel-home',modReferal.panel.Home);
