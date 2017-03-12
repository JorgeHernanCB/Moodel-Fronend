

angular.module('app', [])
    .controller('gitHubDataController', ['$scope','$http', function($scope,$http) {

        $scope.reposLoaded = false;

        $scope.userLoaded = false;

        $scope.username = "yuribr";

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
  "login": "yuribr",
  "id": 7649852,
  "avatar_url": "https://avatars.githubusercontent.com/u/7649852?v=3",
  "gravatar_id": "",
  "url": "https://api.github.com/users/yuribr",
  "html_url": "https://github.com/yuribr",
  "followers_url": "https://api.github.com/users/yuribr/followers",
  "following_url": "https://api.github.com/users/yuribr/following{/other_user}",
  "gists_url": "https://api.github.com/users/yuribr/gists{/gist_id}",
  "starred_url": "https://api.github.com/users/yuribr/starred{/owner}{/repo}",
  "subscriptions_url": "https://api.github.com/users/yuribr/subscriptions",
  "organizations_url": "https://api.github.com/users/yuribr/orgs",
  "repos_url": "https://api.github.com/users/yuribr/repos",
  "events_url": "https://api.github.com/users/yuribr/events{/privacy}",
  "received_events_url": "https://api.github.com/users/yuribr/received_events",
  "type": "User",
  "site_admin": false,
  "name": null,
  "company": null,
  "blog": null,
  "location": null,
  "email": null,
  "hireable": null,
  "bio": null,
  "public_repos": 5,
  "public_gists": 0,
  "followers": 1,
  "following": 1,
  "created_at": "2014-05-20T23:00:40Z",
  "updated_at": "2016-11-24T02:48:37Z"
}

*/
