package com.senac.dispenser.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.senac.dispenser.domain.entity.Exercicio;
import com.senac.dispenser.repository.ExercicioRepository;

@Service
public class ExercicioService {

    private final ExercicioRepository exercicioRepository;

    @Autowired
    public ExercicioService(ExercicioRepository exercicioRepository) {
        this.exercicioRepository = exercicioRepository;
    }

    public List<Exercicio> listarTodos() {
        return exercicioRepository.findAll();
    }

    public Exercicio salvar(Exercicio exercicio) {
        return exercicioRepository.save(exercicio);
    }

    public Exercicio buscarPorId(Long id) {
        return exercicioRepository.findById(id).orElse(null);
    }

    public void deletar(Long id) {
        exercicioRepository.deleteById(id);
    }
}

