var modReferal = function(config) {
	config = config || {};
	modReferal.superclass.constructor.call(this,config);
};
Ext.extend(modReferal,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('modreferal',modReferal);

modReferal = new modReferal();