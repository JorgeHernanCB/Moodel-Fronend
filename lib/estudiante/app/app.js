

angular.module('app', [])
    .controller('gitHubDataController', ['$scope','$http', function($scope,$http) {

        $scope.reposLoaded = false;

        $scope.userLoaded = false;

        $scope.username = "JorgeHernanCB";

        $http.get("https://api.github.com/users/" + $scope.username)
            .success(function (data) {
                $scope.userData = data;
                loadRepos();
            });

        var loadRepos = function () {
            $http.get($scope.userData.repos_url)
                .success(function (data) {
                    $scope.repoData = data;
                });
        };


        $scope.predicate = '-updated_at';


}]);




/*
{
  "login": "JorgeHernanCB",
  "id": 7569870,
  "avatar_url": "https://avatars.githubusercontent.com/u/7569870?v=3",
  "gravatar_id": "",
  "url": "https://api.github.com/users/JorgeHernanCB",
  "html_url": "https://github.com/JorgeHernanCB",
  "followers_url": "https://api.github.com/users/JorgeHernanCB/followers",
  "following_url": "https://api.github.com/users/JorgeHernanCB/following{/other_user}",
  "gists_url": "https://api.github.com/users/JorgeHernanCB/gists{/gist_id}",
  "starred_url": "https://api.github.com/users/JorgeHernanCB/starred{/owner}{/repo}",
  "subscriptions_url": "https://api.github.com/users/JorgeHernanCB/subscriptions",
  "organizations_url": "https://api.github.com/users/JorgeHernanCB/orgs",
  "repos_url": "https://api.github.com/users/JorgeHernanCB/repos",
  "events_url": "https://api.github.com/users/JorgeHernanCB/events{/privacy}",
  "received_events_url": "https://api.github.com/users/JorgeHernanCB/received_events",
  "type": "User",
  "site_admin": false,
  "name": "Jorge Castaño",
  "company": null,
  "blog": null,
  "location": null,
  "email": "jorge.hernantk@gmail.com",
  "hireable": null,
  "bio": null,
  "public_repos": 1,
  "public_gists": 0,
  "followers": 1,
  "following": 2,
  "created_at": "2014-05-13T13:50:44Z",
  "updated_at": "2016-11-25T18:37:15Z"
}
*/
