angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope) {})

.controller('TambahCtrl', function($scope,repositoryService, $ionicPopup){

  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };

  $scope.simpan = function(repository){

    if(!repository.nama_barang){
      $scope.showAlert({
        title: "Information",
        message: "Nama Barang Mohon Diisi"
      });
    }else if(!repository.jenis_barang){
      $scope.showAlert({
        title: "Information",
        message: "Jenis Barang Mohon Diisi"
      });
    }else{
      repositoryService.simpan({
        data: repository
      }).then(function(resp) {
        console.log(resp);
      
        $scope.showAlert({
          title: "Information",
          message: "Data Telah Disimpan"
        });
        // $state.go("tab.buku");
      },function(err) {
        console.error('Error', err);
      }); 
    }

  };

})

.controller('repositoryCtrl', function($scope, $ionicPopup, repositoryService) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };
  
  $scope.remove = function(repository) {
    repositoryService.hapus(repository.id).then(function(resp) {
      console.log(resp);
      $scope.showAlert({
        title: "Information",
        message: "Data Telah Dihapus"
      });
      $scope.showData();
    }, function(err) {
      console.log('Error', err);
    });
  }

  $scope.showData = function() {
    repositoryService.ambilSemua().success(function(dataRepository) {
      $scope.repository = dataRepository;
    });  
  };

  $scope.showData();

  console.log($scope.repository);

})

.controller('repositoryDetailCtrl', function($scope,$stateParams,$ionicPopup,$ionicModal,$state, repositoryService) {

  $scope.showDataId = function() {
  repositoryService.ambilSatu($stateParams.id).success(function(dataRepository) {
    $scope.repository = dataRepository;
  });  
  };

  $scope.showDataId();

  $ionicModal.fromTemplateUrl('edit.html', function(modal){
    $scope.taskModal = modal;
  },{
    scope : $scope,
    animation : 'slide-in-up' 
  });
        
  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };
  
  $scope.editModal = function(){
    $scope.taskModal.show();
  };
  
  $scope.batal = function(){
    $scope.taskModal.hide();
    $scope.showDataId();
  };

  $scope.edit = function(repository){

    if(!repository.nama_barang){
      $scope.showAlert({
        title: "Information",
        message: "Nama Barang Mohon Diisi"
      });
    }else if(!repository.jenis_barang){
      $scope.showAlert({
        title: "Information",
        message: "Jenis Barang Mohon Diisi"
      });
    }else{
      repositoryService.ubah({
        data: repository
      }).then(function(resp) {
        console.log(resp);
      
        $scope.showAlert({
          title: "Information",
          message: "Data Telah Diupdate"
        });
      
        $scope.taskModal.hide();
        // $state.go("tab.buku");
      },function(err) {
        console.error('Error', err);
      }); 
    }
  };
});