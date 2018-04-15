<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/15 0:11
 */

namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo() {
    echo 'Foo\Bar\subnamespace\foo is run! <br>';
}
class foo
{
    static function staticmethod() {
        echo 'Foo\Bar\subnamespace\foo\staticmethod is run! <br>';
    }
}