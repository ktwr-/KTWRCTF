#include<stdio.h>
#include<string.h>

int main(int argc, char *argv[]){
	setbuf(stdin,NULL);
	setbuf(stdout,NULL);
	char buf[100] = {};
	char str[120];
	printf("echo \"Hi, I'm TsugumiYagi.\"!");
	printf("Please tell me your name: ");

	if(fgets(str,1000,stdin) != NULL){
		strcpy(buf,str);
		puts(buf);
		printf("I tell you address of buffer : %p\n",buf);
	}
	return 0;
}
