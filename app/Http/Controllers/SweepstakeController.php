<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayer;
use App\Http\Requests\StoreUpdatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class SweepstakeController extends Controller
{

    public function index()
    {
        $data = Player::all();

        return view('players.Sweepstake.index', compact('data'));
    }

    public function startSweepstake(Request $request)
    {

        $ids = $request->users;
        $amountPlayersPerTeam = intval($request->amountPlayers);
        $numberOfPlayers = count($ids);

        $isInt = $numberOfPlayers / $amountPlayersPerTeam;

        if (floor($isInt) != $isInt) {
            return redirect()->route('sweepstake.index')->withErrors(['msg' => 'Você deve colocar um número de jogadores iguais por time']);
        }



        $high = [];
        $middle = [];
        $low = [];

        $team1 = [];
        $team2 = [];
        $team3 = [];

        foreach ($ids as $id) {
            $player = Player::find($id);

            if ($player->rating <= 4) {
                array_push($low, $player);
            } elseif ($player->rating >= 5 && $player->rating < 8) {
                array_push($middle, $player);
            } else {
                array_push($high, $player);
            }
        }

        if ($numberOfPlayers / $amountPlayersPerTeam == '2') {


            for ($i = 0; $i <= count($high); $i++) {
                shuffle($high);

                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    if (count($high) >= 2) {
                        array_push($team1, array_shift($high));
                        array_push($team2, array_shift($high));
                    } else {
                        array_push($team1, array_shift($high));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    array_push($team2, array_shift($high));
                } else {
                    array_push($team1, array_shift($high));
                }
            }

            for ($i = 0; $i <= count($middle); $i++) {
                shuffle($middle);
                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    if (count($middle) >= 2) {
                        array_push($team1, array_shift($middle));
                        array_push($team2, array_shift($middle));
                    } else {
                        array_push($team1, array_shift($middle));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    array_push($team2, array_shift($middle));
                } else {
                    array_push($team1, array_shift($middle));
                }
            }

            for ($i = 0; $i <= count($low); $i++) {
                shuffle($low);

                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    if (count($low) >= 2) {
                        array_push($team1, array_shift($low));
                        array_push($team2, array_shift($low));
                    } else {
                        array_push($team1, array_shift($low));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam) {
                    array_push($team2, array_shift($low));
                } else {
                    array_push($team1, array_shift($low));
                }
            }
        } elseif ($numberOfPlayers / $amountPlayersPerTeam == '3') {


            for ($i = 0; $i <= count($high); $i++) {
                shuffle($high);

                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    if (count($high) >= 3) {
                        array_push($team1, array_shift($high));
                        array_push($team2, array_shift($high));
                        array_push($team3, array_shift($high));
                    } elseif (count($high) == 2) {
                        array_push($team1, array_shift($high));
                        array_push($team2, array_shift($high));
                    } else {
                        array_push($team1, array_shift($high));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    array_push($team2, array_shift($high));
                    array_push($team3, array_shift($high));
                } elseif ((count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam)) {
                    array_push($team3, array_shift($high));
                } else {
                    array_push($team1, array_shift($high));
                }
            }

            for ($i = 0; $i <= count($middle); $i++) {
                shuffle($middle);
                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    if (count($middle) >= 3) {
                        array_push($team1, array_shift($middle));
                        array_push($team2, array_shift($middle));
                        array_push($team3, array_shift($middle));
                    } elseif (count($middle) == 2) {
                        array_push($team1, array_shift($middle));
                        array_push($team2, array_shift($middle));
                    } else {
                        array_push($team1, array_shift($middle));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    array_push($team2, array_shift($middle));
                    array_push($team3, array_shift($middle));
                } elseif ((count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam)) {
                    array_push($team3, array_shift($middle));
                } else {
                    array_push($team1, array_shift($middle));
                }
            }

            for ($i = 0; $i <= count($low); $i++) {
                shuffle($low);

                if (count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) == $amountPlayersPerTeam) {
                    break;
                } elseif (count($team1) < $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    if (count($low) >= 3) {
                        array_push($team1, array_shift($low));
                        array_push($team2, array_shift($low));
                        array_push($team3, array_shift($low));
                    } elseif (count($low) == 2) {
                        array_push($team1, array_shift($low));
                        array_push($team2, array_shift($low));
                    } else {
                        array_push($team1, array_shift($low));
                    }
                } elseif (count($team1) == $amountPlayersPerTeam && count($team2) < $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam) {
                    if (count($low) >= 2) {
                        array_push($team2, array_shift($low));
                        array_push($team3, array_shift($low));
                    } else {
                        array_push($team3, array_shift($low));
                    }
                } elseif ((count($team1) == $amountPlayersPerTeam && count($team2) == $amountPlayersPerTeam && count($team3) < $amountPlayersPerTeam)) {

                    if (count($team3) <= 3) {
                        array_push($team3, array_shift($low));
                        array_push($team3, array_shift($low));
                    } else {
                        array_push($team3, array_shift($low));
                    }
                } else {
                    array_push($team1, array_shift($low));
                }
            }
        }


        return view('players.Sweepstake.show', ['team1' => $team1, 'team2' => $team2, 'team3' => $team3]);
    }
}
