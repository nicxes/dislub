export default function (context) {
  const data = context.app.$cookies.get('dislub-auth')

  if (!data) {
    if (context.app.router.currentRoute.name !== 'index')
      return context.redirect('/')
  } else
    context.store.dispatch('user/auth', data)
}
