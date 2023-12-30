<?php 

namespace App\Controllers\Cron;

class Jobs extends \App\Controllers\HtmlController {

    private function all(){
        $output = [];
        exec("crontab -l", $output);
        return $output;
    }

    public function index(){
		helper(['form']);
        $data = [
            'jobs' => $this->all()
        ];
        log_message('debug', "Found " . count($data['jobs']));
        return $this->view('Cron/jobs', $data, 'Cron Jobs');
    }

    public function add(){
        $commandLine = $this->request->getPost('new');
        log_message('debug', "Adding " . $commandLine);
        $output = [];
        exec("(crontab -l && echo \"".addslashes($commandLine)."\") | crontab -", $output);
        log_message('debug', implode('\n', $output));
        return redirect()->to('Cron/Jobs');
    }

    public function delete($line){
        $jobs = $this->all();
        $jobs = array_splice($jobs, $line, 1);
        $commands = "";
        foreach ($jobs as $job) {
            if($commands != ""){
                $commands .= " ; ";
            }
            $commands .= "echo \"" . addslashes($job) . "\"";
        }
        exec("crontab -r ; ( ".$commands." ) | crontab -");
        return redirect()->to('Cron/Jobs');
    }
}