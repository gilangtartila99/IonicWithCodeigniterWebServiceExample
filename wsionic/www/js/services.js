angular.module('starter.services', [])

.factory('repositoryService', function($http) {
    var baseUrl = 'http://localhost/wscodeigniter/index.php/api/';
    return {
        ambilSemua: function (){
            return $http.get(baseUrl+'ambilSemua'); 
        },
        ambilSatu: function (id){
            return $http.get(baseUrl+'ambilSatu/?id='+id); 
        },
        simpan: function (repository){
            return $http.post(baseUrl+'simpan',repository,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'
                }
            });
        },
        ubah: function (repository){
            return $http.post(baseUrl+'ubah',repository,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'
                }
            });
        },
        hapus: function (id){
            return $http.get(baseUrl+'hapus/?id='+id);
        }
    };
});