
const webRoutes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('./pages/dashboard/Dashboard.vue'),
        meta: {
            title: 'Dashboard'
        }
    },
    {
        path: '/audit-logs',
        name: 'AuditLogs',
        component: () => import('./pages/AuditLog.vue'),
        meta: {
            title: 'Audit Logs'
        }
    },
];

export default webRoutes;
