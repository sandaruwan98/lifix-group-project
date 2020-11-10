var itemList = {
    items: [],

    addItem: function(itemNo,name,Quantity) {
      this.items.push({
        itemNo: itemNo,
        itemName: name,
        Quantity: Quantity
      });
    },

    deleteItem: function(position) {
      this.items.splice(position, 1);
    }
};
  


  var handlers = {
    addItem: function() {
      var inputQuantity = document.getElementById('item-quantity');
      var select = document.getElementById('item-select');

      if (/\S/.test(inputQuantity.value) && select.value !== '-1') {
        t = select.value.split('-')
        itemList.addItem(t[0],t[1], inputQuantity.value);
        inputQuantity.value = '';
        view.displayItemsList();


        const filteredByKey = itemList.items.map( (item) => {
          return Object.fromEntries(Object.entries(item).filter(([key, value]) => (key === 'Quantity') || (key === 'itemNo')))
        }) 
        console.log( JSON.stringify( filteredByKey));
      }
    },
    deleteItem: function(position) {
      itemList.deleteItem(position);
      view.displayItemsList();
    }
  };
  
  var view = {
    createQuantityLabel: function(text) {
      var Label = document.createElement('label');
      Label.textContent = text;
      Label.className = 'q-text';
      return Label;
    },
    createItemLabel: function(text) {
      var Label = document.createElement('label');
      Label.textContent = text;
      Label.className = 'i-text';
      return Label;
    }, 
    createDeleteButton: function() {
      var deleteButton = document.createElement('button');
      // deleteButton.innerHTML = '<i class="fas fa-window-close delete-button"></i>';
      deleteButton.className = 'delete-button fas fa-window-close';
      return deleteButton;
    },
    displayItemsList: function() {
      var itemsUl = document.getElementById('item-list');
     
     
      itemsUl.innerHTML = '';
      
      itemList.items.forEach(function(item) {
        var itemLi = document.createElement('li');
        var itemLabel = this.createItemLabel(item.itemName);
        var qLabel = this.createQuantityLabel(item.Quantity);
        var deleteButton = this.createDeleteButton();
        
        // itemLi.className = 'it';
        
        itemLi.appendChild(itemLabel);
        itemLi.appendChild(qLabel);
        itemLi.appendChild(deleteButton);
        itemsUl.appendChild(itemLi);
        
      
        
        item.elementReference = itemLi;
      }, this);
    },

    getElementIndex: function(itemElement) {
      var item = itemList.items.find(function(item) {
        return item.elementReference == itemElement;
      });
      return itemList.items.indexOf(item);
    },

    setUpEventListeners: function() {
      var inputQuantity = document.getElementById('item-quantity');
      var itemsUl = document.getElementById('item-list');
      
      inputQuantity.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
          handlers.addItem();
        }
      });
      
      itemsUl.addEventListener('click', function(event) {
        var elementClicked = event.target;

        if (elementClicked.classList.contains('delete-button')) {
          var indexOfElement = view.getElementIndex(elementClicked.parentNode);
          handlers.deleteItem(indexOfElement);
        }
        
      });
    
  
    }
  };
  
  view.setUpEventListeners();
  view.displayItemsList();