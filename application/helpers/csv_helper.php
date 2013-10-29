<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CSV Helpers
 * Inspiration from PHP Cookbook by David Sklar and Adam Trachtenberg
 * 
 * @author		Jérôme Jaglale
 * @link		http://maestric.com/en/doc/php/codeigniter_csv
 */

// ------------------------------------------------------------------------

/**
 * Array to CSV
 *
 * download == "" -> return CSV string
 * download == "toto.csv" -> download file toto.csv
 */
if ( ! function_exists('array_to_csv'))
{
	function array_to_csv($array, $download = "")
	{
		if ($download != "")
		{	
			header('Content-Type: application/csv');
			header('Content-Disposition: attachement; filename="' . $download . '"');
		}		

		ob_start();
		$f = fopen('php://output', 'w') or show_error("Can't open php://output");
		$n = 0;		
		foreach ($array as $line)
		{
			$n++;
			if ( ! fputcsv($f, $line))
			{
				show_error("Can't write line $n: $line");
			}
		}
		fclose($f) or show_error("Can't close php://output");
		$str = ob_get_contents();
		ob_end_clean();

		if ($download == "")
		{
			return $str;	
		}
		else
		{	
			echo $str;
		}		
	}
}

// ------------------------------------------------------------------------

/**
 * Query to CSV
 *
 * download == "" -> return CSV string
 * download == "toto.csv" -> download file toto.csv
 */
if ( ! function_exists('query_to_csv'))
{
	function query_to_csv($query, $headers = TRUE, $download = "")
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('invalid query');
		}
		
		$array = array();
		
		if ($headers)
		{
			$line = array();
			foreach ($query->list_fields() as $name)
			{
				$line[] = $name;
			}
			$array[] = $line;
		}
		
		foreach ($query->result_array() as $row)
		{
			$line = array();
			foreach ($row as $item)
			{
				$line[] = $item;
			}
			$array[] = $line;
		}

		echo array_to_csv($array, $download);
	}
}

if(! function_exists('table_to_csv')){

    function table_to_csv($out,$filename){

        /*
 This file will generate our CSV table. There is nothing to display on this page, it is simply used
 to generate our CSV file and then exit. That way we won't be re-directed after pressing the export
 to CSV button on the previous page.
*/

//First we'll generate an output variable called out. It'll have all of our text for the CSV file.
       // $out = '';

//Next let's initialize a variable for our filename prefix (optional).
        $filename_prefix = 'csv';

//Next we'll check to see if our variables posted and if they did we'll simply append them to out.
       /* if (isset($_POST['csv_hdr'])) {
            $out .= $_POST['csv_hdr'];
            $out .= "\n";
        }

        if (isset($_POST['csv_output'])) {
            $out .= $_POST['csv_output'];
        }*/

//Now we're ready to create a file. This method generates a filename based on the current date & time.
        //$filename = $filename_prefix."_".date("Y-m-d_H-i",time());

//Generate the CSV file header
        header("Content-type: application/vnd.ms-excel");
        header("Content-Encoding: UTF-8");
        header("Content-type: text/csv; charset=UTF-8");
        header("Content-disposition: csv" . date("Y-m-d") . ".csv");
        header("Content-disposition: filename=".$filename.".csv");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
//Print the contents of out to the generated file.
        print $out;

//Exit the script
        exit;
    }
}

/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */