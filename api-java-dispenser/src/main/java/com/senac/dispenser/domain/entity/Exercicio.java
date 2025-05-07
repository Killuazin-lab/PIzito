package com.senac.dispenser.domain.entity;

import jakarta.persistence.*;

@Entity
@Table(name = "exercicio")
public class Exercicio {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "grupo_muscular", nullable = false, length = 50)
    private String grupoMuscular;

    @Column(name = "regiao_corpo", nullable = false, length = 50)
    private String regiaoCorpo;

    @Column(name = "num_repeticao", nullable = false)
    private Integer numRepeticao;

    @Column(name = "num_serie", nullable = false)
    private Integer numSerie;

    @Column(name = "valor_pontos", nullable = false)
    private Integer valorPontos;

    @Column(length = 150)
    private String descricao;

    @Column(name = "status_id", nullable = false)
    private Integer statusId = 1;

    // Getters e Setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getGrupoMuscular() {
        return grupoMuscular;
    }

    public void setGrupoMuscular(String grupoMuscular) {
        this.grupoMuscular = grupoMuscular;
    }

    public String getRegiaoCorpo() {
        return regiaoCorpo;
    }

    public void setRegiaoCorpo(String regiaoCorpo) {
        this.regiaoCorpo = regiaoCorpo;
    }

    public Integer getNumRepeticao() {
        return numRepeticao;
    }

    public void setNumRepeticao(Integer numRepeticao) {
        this.numRepeticao = numRepeticao;
    }

    public Integer getNumSerie() {
        return numSerie;
    }

    public void setNumSerie(Integer numSerie) {
        this.numSerie = numSerie;
    }

    public Integer getValorPontos() {
        return valorPontos;
    }

    public void setValorPontos(Integer valorPontos) {
        this.valorPontos = valorPontos;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Integer getStatusId() {
        return statusId;
    }

    public void setStatusId(Integer statusId) {
        this.statusId = statusId;
    }
}
