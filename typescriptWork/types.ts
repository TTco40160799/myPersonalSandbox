var myString: string;
var myNum: number;
var flg: boolean;
// var strArray: string[];
var strArray: Array<string>;

myString = 'hello From TS'.slice(0,4);

strArray = ['hello',' world'];

console.log(strArray);

/*
function getRuijou(num1: number, num2: number): number{
    return num1**num2;
}

console.log(getRuijou(2,10));

// undefined parameter
function getName(firstName: string, lastName?: string): string{
    if(lastName == undefined){
        return firstName;
    }else{
        return firstName + " " + lastName;
    }
}

console.log(getName('takeshi'));
*/

