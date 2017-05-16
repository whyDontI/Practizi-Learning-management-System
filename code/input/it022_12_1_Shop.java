import java.util.*;
class ShirtNShoes
{
	String colourS[] ={"black","blue","orange","red","green"};
	String sizeS[]={"L","M","S","XL","XXL"};
	String colour[]={"black","brown","purple","grey","yellow"};
	String size[]={"6","7","8","9","10"};
}
class Order extends ShirtNShoes
{
	int shirt [] =new int [5];
	int shoes [] =new int [5];
	int i;
	String temp,temp1;
	Scanner S=new Scanner(System.in);
	void getData()
	{
		System.out.println("Enter the number of shirts");
		for(i=0;i<5;i++)
		{
			System.out.println(""+colourS[i]+" "+sizeS[i]);
			shirt[i]=S.nextInt();
		}
		System.out.println("Enter the number of Shoes");	
		for(i=0;i<5;i++)
		{
			System.out.println(""+colour[i]+" "+size[i]);
			shoes[i]=S.nextInt();
		}
	}
	void present()
	{
		System.out.println("\npresent shirt");
		for(i=0;i<5;i++)
		{
			switch(i)
			{
				case 0:
				System.out.println("colour: "+colourS[i]+" size: L available:"+shirt[i]);
				break;
				case 1:
				System.out.println("colour: "+colourS[i]+" size: M available:"+shirt[i]);
				break;
				case 2:
				System.out.println("colour: "+colourS[i]+" size: S available:"+shirt[i]);
				break;
				case 3:
				System.out.println("colour: "+colourS[i]+" size: XL available:"+shirt[i]);
				break;
				case 4:
				System.out.println("colour: "+colourS[i]+" size: XXL available:"+shirt[i]);
				break;
				default:
				System.out.println("not in shop");
				break;
			}
		}
		System.out.println("\npresent shoes");
		for(i=0;i<5;i++)
		{
			switch(i)
			{
				case 0:
				System.out.println("colour: "+colour[i]+" size: 6 available:"+shoes[i]);
				break;
				case 1:
				System.out.println("colour: "+colour[i]+" size: 7 available:"+shoes[i]);
				break;
				case 2:
				System.out.println("colour: "+colour[i]+" size: 8 available:"+shoes[i]);
				break;
				case 3:
				System.out.println("colour: "+colour[i]+" size: 9 available:"+shoes[i]);
				break;
				case 4:
				System.out.println("colour: "+colour[i]+" size: 10 available:"+shoes[i]);
				break;
				default:
				System.out.println("not in shop");
				break;
			}
		}
	}
	void show()
	{
		System.out.println("Avalaible inventory shirts:");
		present();
	}
	void removeShirt()
	{
		System.out.println("\nEnter the shirt you want to Order");
		temp=S.nextLine();
		temp1=S.nextLine();
		for(i=0;i<5;i++)
		{	
			if((temp.compareTo(colourS[i])==0)&&(temp1.compareTo(sizeS[i])==0)&&shirt[i]!=0)
			{	
				shirt[i]--;
				return;
			}
		}
		System.out.println("Not available");
	}
	void removeShoes()
	{
		System.out.println("\nEnter the Shoes you want to Order");
		temp=S.nextLine();
		temp1=S.nextLine();
		for(i=0;i<5;i++)
		{	
			if(temp.compareTo(colour[i])==0&&(temp1.compareTo(size[i])==0)&&shoes[i]!=0)
			{	
				shoes[i]--;
				return;
			}
		}
			System.out.println("Not available");
	}
}
class Shop
{
	public static void main(String[] args) 
	{
		Scanner S=new Scanner(System.in);
		Order o=new Order();
		int y=1;
		o.getData();
		while(y==1)
		{
			System.out.println("\t1.show available\n\t2.orderShirt\n\t3.orderShoes");
			y=S.nextInt();
			switch(y)
			{
				case 1:
				o.show();
				break;
				case 2:
				o.removeShirt();
				break;
				case 3:
				o.removeShoes();
				break;
				default:
					System.out.println("\nPlease Try Again");
			}
			System.out.println("\nFor continue press 1");
			y=S.nextInt();
		}
		System.out.println("Thank You For Visiting");
	}
}