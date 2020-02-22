<?php
                                return [
                                    //使用mysqli类型快速操作，所以只支持mysql数据库
                                    'sqlType' => 'mysql',
                                    'connections'=>[
                                        'mysql' => [
                                            //主数据库，如果读写分离，主数据库服务器只写不读；如果读写不分离，将其他服务器的数据库链接信息加入host数组里面去就行了
                                            'host' => ['localhost'],
                                            'port' => ['3306'],
                                            'database' => ['test'],
                                            'username' => ['root'],
                                            'password' => [''],
                                            //比utf8不支持小表情存数据库
                                            'charset' => 'utf8mb4',
                                            //数据库部署方式:0单一服务器  1分布式（2个或以上）
                                            'deploy'          => 0,
                                            //数据库读写是否分离，分布式有效
                                            'rwSeparate' => false,
                                            //从数据库，从数据库服务器只读不写；注意：只有在读写分离才将链接信息写在下面
                                            'slaveHost' => [],
                                            'slavePort' => [],
                                            'slaveDatabase' => [],
                                            'slaveUsername' => [],
                                            'slavePassword' => [],
                                        ]
                                    ],
                                    'www.xxx.com'=>[
                                        //这个域名下指定链接信息
                                        'connections'=>[
                                            'mysql' => [
                                                //主数据库，如果读写分离，主数据库服务器只写不读；如果读写不分离，将其他服务器的数据库链接信息加入host数组里面去就行了
                                                'host' => ['localhost'],
                                                'port' => ['3306'],
                                                'database' => ['test2'],
                                                'username' => ['root'],
                                                'password' => [''],
                                                //比utf8不支持小表情存数据库
                                                'charset' => 'utf8mb4',
                                                //数据库部署方式:0单一服务器  1分布式（2个或以上）
                                                'deploy'          => 0,
                                                //数据库读写是否分离，分布式有效
                                                'rwSeparate' => false,
                                                //从数据库，从数据库服务器只读不写；注意：只有在读写分离才将链接信息写在下面
                                                'slaveHost' => [],
                                                'slavePort' => [],
                                                'slaveDatabase' => [],
                                                'slaveUsername' => [],
                                                'slavePassword' => [],
                                            ]
                                        ]
                                    ]
                                ];