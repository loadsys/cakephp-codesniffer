<?php //~PSR1.Classes.ClassDeclaration.MultipleClasses

namespace Foo;

class NiceClass1 {
}

// Error: Can't define more than one class per file.
class NiceClass2 implements Object {
}
