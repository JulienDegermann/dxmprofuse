const api = 'http://localhost:8888/dxmprofuse/src/api/addFiles.php';


/**
 * 
 * @param {FormData} file : attached file to store in the server
 * @returns 
 */
export const sendFiles = async (file) => {
  try {
    const res = fetch(api, {
      method: 'POST',
      body: file,
      header: {
        'Content-Type': 'multipart/form-data'
      }
    });
    return res;
  }
  catch (e) {
    console.log('error : ' + e);
  }
}


/**
 * 
 * @param {FormData} file : attached file to store in the server
 * @returns 
 */
export const updateFiles = async (file) => {
  const res = await sendFiles(file);
  const data = await res.json();
  console.log(data);
  if (res.message === 'success') {
    location.reload();
  }

  return data;
}