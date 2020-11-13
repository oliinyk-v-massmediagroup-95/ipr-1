export function Auth({ next, router }) {
    const isUserAuthorized = router.app.$store.getters.isUserAuth;

    if (isUserAuthorized) {
        return next();
    }

    return router.push({ path: '/login' });
}

export function Guest({ next, router }) {
    const isUserAuthorized = router.app.$store.getters.isUserAuth;

    if (!isUserAuthorized) {
        return next();
    }

    return router.push({ path: '/dashboard' });
}
