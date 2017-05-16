#include<stdio.h>
#include<string.h>
main()
{
char input[1000];
int i,j,n,z=0;
scanf("%d",&n);
z=n;
for(i=0;i<n;i++)
scanf("%c",&input[i]);
for(i=0;i<n;i++)
{
    if(input[i]==' ' && (input[i+1]==' ' || input[i-1]==' '))
    {
        --z;
        for(j=i;j<n;j++)
        input[j]=input[j+1];
    }
}
for(i=0;i<z;i++)
    printf("%c",input[i]);
printf("\n");
}
