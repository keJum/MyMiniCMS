<template>
  <sidebar-menu :menu="menu" />
</template>

<script>
	import  { SidebarMenu }  from  'vue-sidebar-menu'
	export default {
		components:{
			SidebarMenu
		},
        data() {
            return {
                menu: [
                    {
                        header: true,
                        title: 'Main Navigation',
                        // component: componentName
                        // visibleOnCollapse: true
                        // class:''
                        // attributes: {}
                    },
                    {
                        href: '/',
                        title: 'Dashboard',
                        icon: 'fa fa-user',
                        // disabled: true
                        // class:''
                        // attributes: {}
                        /*
                        badge: {
                            text: 'new',
                            // class:''
                            // attributes: {}
                        }
                        */
                    },
                    {
                        title: 'Charts',
                        icon: 'fa fa-chart-area',
                        child: [
                            {
                                href: '/charts/sublink',
                                title: 'Sub Link',
                            }
                        ]
                    }
                ]
            }
        }
    }
</script>

