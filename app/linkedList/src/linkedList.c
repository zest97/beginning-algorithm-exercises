#include <stdio.h>
#include <stdlib.h>

struct node {
    int value;
    struct node* next;
};
typedef struct node node_t;

void printList(node_t *head);
void freeList(node_t *head);
int sizeOfLinkedList(node_t *head);
node_t *create_new_node(int value);
node_t *insert_at_head(node_t *head, node_t *node_to_insert);
void insert_node_at(node_t *head, node_t *node_to_insert, int index_to_insert);

int main(int argc, char *argv[])
{
    node_t *head = NULL;

    for(int i = 0; i < 25; i++)
    {
        node_t *tmp = create_new_node(i);
        head = insert_at_head(head, tmp);
    }

    printList(head);

    int totalSize = sizeOfLinkedList(head);

    int middle = (int)totalSize / 2;

    node_t *new_node = create_new_node(70);
    insert_node_at(head, new_node, middle);

    freeList(head);

    return 0;
}

node_t *create_new_node(int value)
{
    node_t *result = malloc(sizeof(node_t));
    result->value = value;
    result->next = NULL;
    return result;
}

node_t *insert_at_head(node_t *head, node_t *node_to_insert)
{
    node_to_insert->next = head;
    return node_to_insert;
}

void printList(node_t *head)
{
    node_t *temporary = head;
    printf("Linked List\n");
    while(temporary != NULL)
    {
        printf("%d ", temporary->value);
        temporary = temporary->next;
    }
    printf("\n");
}

void freeList(node_t *head)
{
    node_t *tmp;
    printf("Clearing Linked List...\n");
    while (head != NULL)
    {
       tmp = head;
       head = head->next;
       free(tmp);
    }
    printf("Finish Clearing\n");
}

int sizeOfLinkedList(node_t *head)
{
    int size = 0;
    node_t *temporary = head;
    while(temporary != NULL)
    {
        size++;
        temporary = temporary->next;
    }
    printf("Size of LinkedList - %d\n", size);
    return size;
}

void insert_node_at(node_t *head, node_t *node_to_insert, int index_to_insert)
{
    int size = sizeOfLinkedList(head);
    if(index_to_insert > 0 && index_to_insert < size)
    {
        node_t *temporary = head;
        int index = 0;
        while(temporary != NULL)
        {
            if (index == index_to_insert)
            {
                node_to_insert->next = temporary->next;
                temporary->next = node_to_insert;
                break;
            }
            temporary = temporary->next;
            index++;
        }
        printList(head);
    }
    else
    {
        printf("Index is out of bound for current linked list.\n");
    }
}
