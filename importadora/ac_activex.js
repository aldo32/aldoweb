//
//
function AC_AX_RunContent(){
  var ret = AC_GetArgs(arguments);
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_RunFlashContent(){
  var ret = 
    AC_GetArgs
    (  arguments, "movie", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
     , "application/x-shockwave-flash"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_RunMMContent(){
  var ret = 
    AC_GetArgs
    (  arguments, "filename", "clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95"
     , "application/x-mplayer2"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_RunRealContent(){
  var ret = 
    AC_GetArgs
    (  arguments, "src", "clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA"
     , "audio/x-pn-realaudio-plugin"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_RunQTContent(){
  var ret = 
    AC_GetArgs
    (  arguments, "src", "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"
     , "video/quicktime"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_Generateobj(objAttrs, params, embedAttrs) 
{ 
  var str = '<object ';
  for (var i in objAttrs)
    str += i + '="' + objAttrs[i] + '" ';
  str += '>';
  for (var i in params)
    str += '<param name="' + i + '" value="' + params[i] + '" /> ';
  str += '<embed ';
  for (var i in embedAttrs)
    str += i + '="' + embedAttrs[i] + '" ';
  str += ' ></embed></object>';

  document.write(str);
}

function AC_GetArgs(args, srcParamName, classid, mimeType){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    
    switch (currArg){	
/// embed args
      case "pluginspage":
      case "type":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
/// object args
      case "data":
      case "codebase":
      case "classid":
      case "id":
        ret.objAttrs[args[i]] = args[i+1];
        break;
/// common args
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
// special args
      case "src":
        ret.embedAttrs["src"] = args[i+1];
        ret.params[srcParamName] = args[i+1];
        break;
// params
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }

  if (classid) ret.objAttrs["classid"] = classid;
  if (mimeType) ret.embedAttrs["type"] = mimeType;

  return ret;
}
