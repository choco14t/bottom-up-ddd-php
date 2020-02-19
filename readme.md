# Bottom Up DDD PHP

Link: https://choco14t.blog/posts/wrote-a-bottom-up-ddd-with-laravel

このリポジトリは[ボトムアップドメイン駆動設計 │ nrslib](https://nrslib.com/bottomup-ddd/)をPHPとLaravelで書き換えたプロジェクトです。

対象のクラスは`packages`以下に配置しています。
```
./packages
└── BottomUpDDD
    ├── Common
    │   └── Util.php
    ├── Domain
    │   ├── Application
    │   │   ├── CircleApplication.php
    │   │   ├── Models
    │   │   │   ├── FullNameModel.php
    │   │   │   ├── UserModel.php
    │   │   │   └── UserSummaryModel.php
    │   │   └── UserApplication.php
    │   ├── Circles
    │   │   ├── Circle.php
    │   │   ├── CircleFactoryInterface.php
    │   │   ├── CircleId.php
    │   │   ├── CircleNotificationInterface.php
    │   │   └── CircleRepositoryInterface.php
    │   ├── EquatableInterface.php
    │   ├── UnitOfWorkSample
    │   │   ├── UnitOfWorkInterface.php
    │   │   └── UserApplication.php
    │   └── Users
    │       ├── FullName.php
    │       ├── User.php
    │       ├── UserFactoryInterface.php
    │       ├── UserId.php
    │       ├── UserName.php
    │       ├── UserRepositoryInterface.php
    │       └── UserService.php
    ├── InMemoryInfrastructure
    │   └── InMemoryUserRepository.php
    ├── ProductInfrastructure
    │   ├── Eloquents
    │   │   ├── BaseEloquent.php
    │   │   └── UserEloquent.php
    │   ├── UnitOfWorkSample
    │   │   └── UnitOfWork.php
    │   └── Users
    │       ├── UserFactory.php
    │       └── UserRepository.php
    └── WebApplication
        └── ViewModel
            ├── EditUserViewModel.php
            ├── RegisterUserViewModel.php
            ├── UserDetailViewModel.php
            ├── UserSummaryViewModel.php
            └── UserViewModel.php
```
