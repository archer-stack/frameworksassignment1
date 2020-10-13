<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class SessionManagerTest extends TestCase{

        public function testSession(){
            $tmpSession = new SessionManager();
            $this->assertInstanceOf('SessionManager', $tmpSession);
        }

        public function testCreate(){
            SessionManager::create();
            $this->assertEquals(PHP_SESSION_ACTIVE, true);
        }

        public function testDestroy(){
            SessionManager::destroy();
            $this->assertEquals(PHP_SESSION_NONE, true);
        }

        public function testAdd(){
            SessionManager::create();
            SessionManager::add("Age","21");
            $this->assertEquals($_SESSION["Age"], "21");
        }

        public function testRemove(){
            SessionManager::remove("Age");
            $this->assertEquals(isset($_SESSION["Age"]), false);
        }

        public function testAccessible(){
            SessionManager::add("user","Chris");
            $this->assertEquals(SessionManager::accessible("Chris","login.php"), false);
            $this->assertEquals(SessionManager::accessible("Chris","signup.php"), false);
            $this->assertEquals(SessionManager::accessible("Chris","courses.php"), true);
            $this->assertEquals(SessionManager::accessible("Chris","profile.php"), true);
        }
    }
?>