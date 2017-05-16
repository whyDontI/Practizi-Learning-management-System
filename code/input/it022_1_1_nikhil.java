import java.lang.*;
class nikhil implements Cloneable{
	int number1;
	int number2;

	nikhil(int number1, int number2){
		this.number1 = number1;
		this.number2 = number2;
	}


	public static void main(String[] args) throws CloneNotSupportedException {
		nikhil obj = new nikhil(1, 2);
		nikhil obj2 = (nikhil) obj.clone();

		System.out.println(obj.number1+" "+obj.number2);
		System.out.println(obj2.number1+" "+obj2.number2);
	}

}