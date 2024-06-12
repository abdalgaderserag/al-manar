axios.get('api/user/3').then((res)=>{
    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + res.token;
});
