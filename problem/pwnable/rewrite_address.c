#include<stdio.h>
#include<string.h>
#include<stdlib.h>

void printflag(){
	FILE *fp;
  char readline[256] = {'\0'};
	fp = fopen("flag.txt","r");
	while(fgets(readline,256,fp) != NULL){
		puts(readline);
	}
}

int main(int argc, char *argv[]){
	setbuf(stdin,NULL);
	setbuf(stdout,NULL);
	char buf[12] = {};
	char str[120];
	printf("Do you know address of 'printflag' function?\nYou can input code for replace address\n");

	if(fgets(str,120,stdin) != NULL){
		strcpy(buf,str);
		puts(buf);
		printf("I tell you address of buffer : %p\n",buf);
	}
	return 0;
}
