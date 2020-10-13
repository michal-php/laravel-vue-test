import store from "../store";
import router from "../routes"

class Auth{

     static login(email, password, then){
        axios.get('/sanctum/csrf-cookie').then(() => {

            axios.post('login', {
                email: email,
                password: password
            }).then((user) => {
                console.log(user);

                store.commit('setUserData', user.data);
                router.push({name: 'Home'});
            }).catch(error => {
                if (404 === error.response.status) {
                    Auth.logout();
                    console.log(error);
                }else{
                    console.log(error);
                }
            });
        });

    }

    static logout(){
        axios.post('logout').then(() => {
            store.commit('clearUserData');
            location.reload();
        }).catch(error => {
            console.log(error);
        });
    }

    static isLoggedIn(){
         return !(localStorage.getItem('user') == null);
    }

}

export default Auth;
