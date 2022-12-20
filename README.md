# login with google requrement
```
you need to clint id and secret key 
`https://console.cloud.google.com`

you need Socialite poackage
`https://github.com/laravel/socialite`
```
# login with fb requrement
```
you need fb devloper account
`https://developers.facebook.com/apps/`


you need Socialite poackage
`https://github.com/laravel/socialite`
```
`note: all the social miedia login intrigation are same`

# login with github
```
create app and get the clint id
`https://docs.github.com/en/rest/guides/basics-of-authentication?apiVersion=2022-11-28`
```

# Pro Tip
```
use `php artisan optimize:clear`  for clear all the cache
articals `https://dev.to/siddhartha/api-authentication-via-social-networks-in-laravel-8-using-sanctum-with-socialite-36pa`
Note: 1.make sure run this project in `http://localhost:8000`
      2.provider_id (google, fb and allsocial media app can genrate uid for the evry user we can store the id in user tabel ) has beed change evry sociale media accounte
```
```
if we need intrigate 2 or more social media,it good practic to ruduce the code
1.we can create two column "provider" and "provider_id"
2.we can pass provider wen user click any social media login button as well sa same the callback route
3.We need to create a callback method in the controller created earlier on for Twitter because the AbstractProvider for the TwitterProvider does not implement stateless (Stateless just means there is no sessions stored.)

```

# QUATION 
```
1.how to manage code wen we are using social login 
	-make daynamic controller and route
2.how to use passport for social login
        -passport provide  full auth service
3.how to setup for the production mode 
4.use of login user fb_id and google_id ,what it can do,can i get user recode using thare auth id 
	-get the exting user recode in the db behinde the provider id
```
