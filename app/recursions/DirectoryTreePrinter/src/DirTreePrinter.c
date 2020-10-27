#include <stdio.h>
#include <dirent.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <unistd.h>
#include <string.h>
#include <stdlib.h>

struct dirent *entry;

int isDirectory(char *path);
void readAllFiles(char *basePath, DIR *folder);
void walkIntoDirectory(char *basePath);

int main(int argc, char *argv[])
{
    walkIntoDirectory(".");

    return(0);
}

void walkIntoDirectory(char *basePath)
{
    DIR *folder;
    folder = opendir(basePath);
    if(folder != NULL)
    {
        readAllFiles(basePath, folder);
    }
    closedir(folder);
}

void readAllFiles(char *basePath, DIR *folder)
{
    int files = 0;
    while( (entry=readdir(folder)) )
    {
        files++;

        // allocate space for parent directory, "/", subdir, plus NULL terminator
        char *subdir;
        subdir = malloc(strlen(basePath) + strlen(entry->d_name) + 2);
        // Concatenate directory name
        strcpy(subdir, basePath);
        strcat(subdir, "/");
        strcat(subdir, entry->d_name);

        /* Recurse at a new indent level */
        if(isDirectory(subdir))
        {
            /* Found a directory, but ignore . and .. */
            if(strcmp(".", entry->d_name) == 0 || strcmp("..", entry->d_name) == 0)
                continue;

            /* Recurse at a new indent level */
            walkIntoDirectory(subdir);
        } else
        {
            printf("%s \n", subdir);
        }
        free(subdir);

    }
}

int isDirectory(char *path) {
   struct stat statbuf;
   if (stat(path, &statbuf) != 0)
       return 0;
   return S_ISDIR(statbuf.st_mode);
}
