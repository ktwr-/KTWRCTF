#include<stdio.h>
#include<string.h>

int main(int argc,char *argv[])
{
  setbuf(stdin,NULL);
  setbuf(stdout,NULL);
 
  char shellcode[256] = {'\0'}; 
  if(fgets(shellcode,256,stdin) != NULL){
  	(*(void (*)())shellcode)();
	}
}
