# FAQ. CRUD Panel in Zed

FAQ module is available via in back office via left navigation under Administration section.
It includes two submodules: List and Create.

## Creating a new FAQ
After pressing Create you will be redirected to the simple create form.
To create a new FAQ you should fill in both name and answer fields and press Submit button.
### Name field
contains a brief FAQ and should be filled in.
### Answer field
contains a brief answer and should be filled in as well. Answer minimum length is at least 50 symbols.


## Updating the FAQ
To update the FAQ you should go to the left navigation and choose Administration > FAQ > List.
You will be redirected to the FAQ table in which you will see all active FAQs with brief answers.
Edit button is next to each answer. Press it, and you will be redirected to the edit form.
Change something in the form fields if necessary.
Both fields should be filled in. Remember that the answer minimum length is at least 50 symbols.
Press Submit button. Your changes have already been saved in the database, and you will be redirected to the FAQ list.

## Deleting the FAQ
You can only delete the FAQ in case you will never need it again, and you are absolutely sure of it.
Otherwise, [FAQ deactivating](#FAQ-deactivating) is strongly recommended.
To delete the FAQ you should go to the left navigation and choose Administration > FAQ > List just like for updating.
You will be redirected to the FAQ table in which you will see all active FAQs with brief answers.
Delete button is in each line between Edit and Deactivate button. Press it, and you will be redirected to delete form.
You don't need to change something here. Just press Submit button for deleting the FAQ.
#### Attention!
After pressing Submit button FAQ will be deleted, removed from the database, and you will have no possibility to restore it, unless you wish to [create it again](#Creating-a-new-FAQ).

## FAQ deactivating
FAQ deactivating is recommended in case you don't need this FAQ at the moment but there is a possibility of using it in the future.
To deactivate the FAQ you should go to the left navigation and choose Administration > FAQ > List just like for updating or deleting.
You will be redirected to the FAQ table in which you will see all active FAQs with brief answers.
Deactivate button is in the end of each line. Press it, and the FAQ will be deactivated.
It means that you will not see it in Administration > FAQ > List, but it is still in the database, and it can be restored.

## Database scheme
Is under src/Pyz/Shared/Faq/Transfer/faq.transfer.xml
```bash
<transfer name="Faq">
        <property name="idFaq" type="int"/>
        <property name="name" type="string"/>
        <property name="answer" type="string"/>
        <property name="active" type="int"/>
    </transfer>
```
