function selectionCheck(anchor) {
  let nodeIndicate;
  var acrIndex = Array.from(anchor.anchorNode.parentNode.parentNode.childNodes).indexOf(anchor.anchorNode.parentNode);
  var fcsIndex = Array.from(anchor.focusNode.parentNode.parentNode.childNodes).indexOf(anchor.focusNode.parentNode);
  
  if(anchor.anchorNode.parentNode.nodeName == "SPAN") {
    if(acrIndex == fcsIndex){
      nodeIndicate = 1;
      return nodeIndicate;
    }
    else {
      nodeIndicate = 0;
      return nodeIndicate;
    }
  }
  else if(anchor.anchorNode.parentNode.nodeName == "DIV" ) {
    nodeIndicate = -1;
    return nodeIndicate;
  }
}

function wrapper(text) {
  let wrapper = document.createElement("span");
  wrapper.append(text);
  return wrapper;

}

function anchor(anchor) {
var parent = anchor.anchorNode.parentNode.parentNode;
return parent;
}
//select container and store in var
let master = $('#note');
let spanTest = document.createElement('span');
spanTest.append("Halo Nama Saya Adalah Dewanata")
//
master.css("border","solid 1px gray");
master.css("padding","20")
//buat editable div
let note = document.createElement('div');
$(note).attr("contenteditable","true");
$(note).css("height","200",)
$(note).css("border","solid 1px gray",)
$(note).append(spanTest);

//tambahkan note ke master
master.append(note)

//create button format
let boldButton = document.createElement('button');
let italicButton = document.createElement('button');
let underlineButton = document.createElement('button');
//
boldButton.innerText = "B";
italicButton.innerText = "i";
underlineButton.innerText = "U";
//add button to master
master.prepend(boldButton);
master.append(italicButton);
master.append(underlineButton);
//
//add event listener
$(boldButton).on("click", warpTeks);



function warpTeks() {

  let checkSelect = selectionCheck(document.getSelection())
  var selectNode = document.getSelection();
  // var anchorIndex = Array.from(document.getSelection().anchorNode.parentNode.childNodes).indexOf(document.getSelection().anchorNode);
  // let wrapper = document.createElement("span");
  // wrapper.append(document.getSelection().toString());
  
  if(checkSelect == 1)
  {
    var fcsIndex = Array.from(selectNode.focusNode.parentNode.childNodes).indexOf(selectNode.focusNode);
    selectNode.focusNode.parentElement.childNodes[fcsIndex].splitText(selectNode.focusOffset);
    var wrapping = wrapper(selectNode.focusNode.nextSibling);
    selectNode.focusNode.parentNode.parentNode.insertBefore(wrapping,selectNode.focusNode.parentNode.nextSibling)
    //selectNode.deleteFromDocument();
    //var anchor = document.getSelection();
 
    //console.log(acrIndex+ "  " +fcsIndex)
    // selectNode.focusNode.nextSibling.remove()
    //anchorIndex = Array.from(getSelect.parentNode.childNodes).indexOf(getSelect);
    // selectNode.parentElement.childNodes[anchorIndex].splitText(document.getSelection().anchorOffset);
    // document.getSelection().deleteFromDocument();
    // getSelect.parentNode.insertBefore(wrapper,getSelect.nextSibling)
    // console.log(test);
    // parent.insertBefore(wrapper,getSelect.parentNode.childNodes[anchorIndex+1])
  }
  else if(checkSelect == 0)
  {
    var selectNode = document.getSelection();
    var wrapping = wrapper(selectNode.toString());
    var awal = anchor(selectNode);
    var acrIndex = Array.from(selectNode.anchorNode.parentNode.parentNode.childNodes).indexOf(selectNode.anchorNode.parentNode);
    document.getSelection().deleteFromDocument();
    console.log(awal)
    awal.insertBefore(wrapping,awal.childNodes[acrIndex].nextSibling);
    
  }

  // if(checkSelect == 0)
  // {
  //   getSelect.parentElement.childNodes[anchorIndex].splitText(document.getSelection().anchorOffset);
  //   document.getSelection().deleteFromDocument();
  //   getSelect.parentNode.insertBefore(wrapper,getSelect.nextSibling)
  // }

  // if(checkSelect == -1)
  // {
  //   document.getSelection().deleteFromDocument();
  //   getSelect.parentNode.parentNode.insertBefore(wrapper,getSelect.parentNode.nextSibling)
  // }
  // else
  // {
    
  // }
}

//main program
function boldFormat()
{
  var focusIndex = Array.from(note.childNodes).indexOf(getSelectLast.parentNode);
  var anchorIndex = Array.from(note.childNodes).indexOf(getSelect.parentNode);
  var getSelect = document.getSelection().anchorNode;
  var getSelectLast = document.getSelection().focusNode;
  
  for(let i = anchorIndex; i <= focusIndex; i++)
  {
    $(note.children[i]).css("font-weight","bold")
  }
    
}

note.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
      event.preventDefault();
      note.appendChild(document.createElement('br'));
    }
});

// function ReplaceText(text="", fullText="")
// {
//     var bold = "<span>" + text + "</span>";
//     bold.textContent=text;
//     fullText = fullText.replace(text,bold)
//     return fullText;

// }

// function deleteSelection()
// {
//     var aps = window.getSelection();
//     aps.deleteFromDocument();
//     alert(aps)
// }

// function containsSelection()
// {
//     var aps = window.getSelection();
//     console.log(aps.anchorNode.in)
// }

// function selectChild()
// {
//     var aps = window.getSelection();
//     console.log(aps.selectAllChildren())
    
// }

