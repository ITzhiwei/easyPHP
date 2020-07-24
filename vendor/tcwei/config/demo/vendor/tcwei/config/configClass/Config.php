<?php
   
    namespace tcwei\configClass;
    /**
     * 获取配置类
     */
    class Config implements \ArrayAccess{
        
        /** 
         * 配置参数 array
         */
        protected $config = [];
        
        /**
         * 默认读取的配置文件名前缀（不带后缀）
         */
        protected $fileName = 'app';
        
        /**
         * 配置文件的后缀
         */
        protected $type = '.php';
        
        /**
         *  配置文件默认目录 vendor的同级目录
         */
        public static $path = null; 
        
        /**
         * 读取不存在的配置时返回的值
         */
        public static $default = null;
        
        //这里并不是为了单例模式而设置，是为了动态调用与静态调用混用塔桥
        public static $obj = null;
        public function __construct(){
            if(self::$path === null){
                self::$path = (__DIR__).'/../../../../config/';
            };
            self::$obj = $this;
        }
        
        /**
         * 获取配置参数
         * @param string $name 支持多级获取，英文点号为分隔符，如果$name为空时返回所有已经读取的参数。没有 . 号，则直接读取默认app.php文件里面的参数
         * @return 若读取的配置存在时则返回配置值，不存在时默认 null ；默认值可修改 self::$default = null;
         */
        public static function pull($name = ''){
            if(self::$obj){
                $thisObj = self::$obj;
            }else{
                $thisObj = new Config;
            }
            return $thisObj[$name];
        }
        
        /**
         * 由 $name 分析所得； 
         * 如分析得出：app.ffmpegPath
         */
        protected $paramArr = null;
        
        /**
         * 获取配置参数
         * @param string $name 支持多级获取，英文点号为分隔符，如果$name为空时返回所有已经读取的参数所在的配置文件的所有参数。没有 . 号，则直接读取默认app.php文件里面的参数
         * @return 若读取的配置存在时则返回配置值，不存在时默认 null ；默认值可修改 self::$default = null;
         */
        public function get($name = null){
            
            if(!$name){
                //Data::$data[self::$path] 是为了多目录下读取文件防止配置名称重复
                return !empty(Data::$data[self::$path])?Data::$data[self::$path]:Data::$data[self::$path] = '';
            };
            
            //查看是否存在该值
            $exist = $this->exist($name);
            
            if($exist !== false){
                //存在，直接返还值
                return $exist;
            }else{
                //不存在，尝试加载对应的配置文件
                $paramArr = $this->paramArr;
                $path = self::$path;
                if(substr($path, -1) !== '/'){
                    $path .= '/';  
                };
                $configFileName = $path.$paramArr[0].$this->type;
                $config = Data::$data[self::$path];
                
                if(!isset($config[$paramArr[0]])){
                    
                    if(is_file($configFileName)){
                        
                        $config[$paramArr[0]] = include_once($configFileName);
                        
                        Data::$data[self::$path] = $config;
                        
                        //查看是否存在该值
                        $exist = $this->exist($name);
                        if($exist !== false){
                            //存在，直接返还值
                            return $exist;
                        }else{
                            return self::$default;
                        }
                        
                    }else{
                        return self::$default;
                    }
                    
                }else{
                    return self::$default;
                }
                
            }
            
        }
        
        /**
         * 检测class缓存的数据中是否存在该配置参数（注意是class缓存中的数据，不包含未加载的数据）
         * 当参数不存在或者为空时，返回 false
         * @return false || $value 存在时返回值
         */
        public function exist($name){
            
            //根据输入的$name获取各级参数
            $paramArr = $this->analysisName($name);
            
            $this->paramArr = $paramArr;
            
            $topConfig = !empty(Data::$data[self::$path])?Data::$data[self::$path]:Data::$data[self::$path] = [];
            
            foreach($paramArr as $value){
                if($value != '*') {
                    if (!isset($topConfig[$value])) {
                        return false;
                    } else {
                        if ($topConfig[$value] === '') {
                            return false;
                        }
                    }
                    $topConfig = $topConfig[$value];
                }
            }
            return $topConfig;
            
        }
        
        
        /**
         * 分析 $name 并组合 $name
         * @return array $paramArr $paramArr[0] = 文件名前缀 $paramArr[1] 配置文件中的一级变量key 可多级获取
         */
        public function analysisName($name){
            //先进行 $name 分析并组装
            //不存在.号时直接选取默认文件的前缀
            if(!strpos($name, '.')){
                $name = $this->fileName . '.' . $name;  
            };
            
            //将 $name 分级存入
            $paramArr = [];
            
            foreach(explode('.', $name) as $value){
                    $paramArr[count($paramArr)] = $value;
            }
            
            return $paramArr;
        }
        
        /**
         * 删除class缓存中的数据
         * 最多支持4级，需要更高级别可看源代码增加
         * @return bool  ture|false 当该值不存在时返回false 存在时删除并返回 true
         */
        public function remove($name){
            
            $exist = $this->exist($name);
            if($exist === false){
                return false;
            }else{
                $paramArr = $this->paramArr;
                $config = Data::$data[self::$path];
                $paramArrLenth = count($paramArr);
                    
                switch($paramArrLenth){
                    case 1:
                        unset($config[$paramArr[0]]);
                    break;
                    case 2:
                        unset($config[$paramArr[0]][$paramArr[1]]);
                    break;
                    case 3:
                        unset($config[$paramArr[0]][$paramArr[1]][$paramArr[2]]);
                    break;
                    case 4:
                        unset($config[$paramArr[0]][$paramArr[1]][$paramArr[2]][$paramArr[3]]);
                    break;
                    default:
                        return false;
                }
                Data::$data[self::$path] = $config;
            }
            return true;
        }
        
        /**
         * 动态增加class缓存中的数据
         * @return bool 设置成功返回true，设置失败返回false，失败原因：超出设置层级，最高支持4级
         */
        public function set($name, $value){
            
            $paramArr = $this->paramArr;
            $config = Data::$data[self::$path];
            $paramArrLenth = count($paramArr);
            
            switch($paramArrLenth){
                    case 1:
                        $config[$paramArr[0]] = $value;
                    break;
                    case 2:
                        $config[$paramArr[0]][$paramArr[1]] = $value;
                    break;
                    case 3:
                        $config[$paramArr[0]][$paramArr[1]][$paramArr[2]] = $value;
                    break;
                    case 4:
                        $config[$paramArr[0]][$paramArr[1]][$paramArr[2]][$paramArr[3]] = $value;
                    break;
                    default:
                        return false;
            }
            
            Data::$data[self::$path] = $config;
                
            return true;
            
            
        }
        
        
        public function offsetSet($name, $value){
            $this->set($name, $value);
        }
    
        public function offsetExists($name){
            //不填写这个则是检测当前class内是否存在该配置值。填写则会先检测class内的缓存数据是否存在该值，不存在则去文件中找
            $this->get($name);
            return $this->exist($name);
        }
    
        public function offsetUnset($name){
            $this->remove($name);
        }
    
        public function offsetGet($name){
            return $this->get($name);
        }
        
        
    }
    
    

