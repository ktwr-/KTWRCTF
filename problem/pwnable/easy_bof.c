#include<stdio.h>
#include<stdlib.h>
#include<string.h>


int authcheck(char *passwd){
  int auth_flag = 0;
  char pass_buf[16]; 
  strcpy(pass_buf,passwd);
  
  if(strcmp(pass_buf,"44GC44GBXu+9nuW/g+OBjOOBtOOCh+OCk+OBtOOCh+OCk+OBmeOCi+OCk+OBmOOCg+OBgV7vvZ4g") == 0){
    auth_flag = 1;
  }
  return auth_flag;
}

int main(int argc, char *argv[]){
  setbuf(stdin,NULL);
  setbuf(stdout,NULL);
  FILE *fp;
  char str[1000];
  char readline[256] = {'\0'};
  char no[] = "no";
  fp = fopen("flag.txt","r");
  while(1){
    printf("Hi. Do you want to flag?\nenter pass: ");
    if(fgets(str,1000,stdin) != NULL){
      if(strstr(str,no) != NULL){ break;}
      if(authcheck(str) != 0){
        while(fgets(readline,256,fp) != NULL ) {
          puts(readline);
        }
        break;
      }
      printf("Oops. Password is wrong.\n");
    }else{
      printf("Please input in 1000 character\n");
    }
  }

  printf("bye\n");
}
