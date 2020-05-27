interface UserInterface{
    name: string;
    email: string;
    age: number;
    register();
    payInvoice();
}

class User implements UserInterface{
    name: string;
    email: string;
    age: number;

    constructor(name: string, email: string, age: number){
        this.name = name;
        this.email = email;
        this.age = age;

        console.log('User Created: ' + this.name);
    }

    register(){
        console.log(this.name + ' is now registerd');
    };

    payInvoice(){
        console.log(this.name + ' paid invoice');
    };
}

class Member extends User{
    id: number;

    constructor(id: number, name: string, email: string, age: number){
        super(name, email, age);
        this.id = id;
    }

    payInvoice(){
        super.payInvoice()
    };
}

/*
var john = new User('Jason', '13th@friday.com', 34);
john.register();
*/

var Mike: User = new Member(1, 'Mike', 'Mike@smith.com', 33);
Mike.payInvoice();